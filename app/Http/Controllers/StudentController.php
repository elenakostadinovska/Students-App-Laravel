<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\University; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load 'university' relationship to avoid N+1 queries
        $students = Student::with('university')->latest()->paginate(5);

        return view('students.index', compact('students'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Fetch all universities to display in the dropdown
        $universities = University::all(); // Fetch all universities
        return view('students.create', compact('universities')); // Pass universities to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        // Handle image upload (if any)
        $imageName = null;
        if ($request->hasFile('image_upload')) {
          

            $imagePath = $request->file('image_upload')->store('images', 'public');
            $imageName = $request->image_upload->hashName();
        }

        // Create the student and save the image path along with the university_id
        Student::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'image_upload' => $imageName,  // Save image path if any
            'university_id' => $request->university_id, // Save the selected university_id
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        // Fetch all universities for the dropdown
        $universities = University::all(); // Fetch all universities for the dropdown
        return view('students.edit', compact('student', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {
        // Retain the old image path if no new image is uploaded
        $imagePath = $student->image_upload;
    
        // Check if a new image is uploaded
        if ($request->hasFile('image_upload')) {
            // Delete the old image if a new one is uploaded and it's not a default image
            if ($imagePath && $imagePath != 'default.png') {
                // Delete the old image from the 'storage/images' folder
                $oldImagePath = storage_path('app/public/images/' . $imagePath);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Store the new image in the 'storage/images' folder and get the filename
            $imagePath = $request->file('image_upload')->getClientOriginalName();
            $request->file('image_upload')->storeAs('images', $imagePath, 'public');  // Store in 'storage/app/public/images'
        }
    
        // Update the student with the new image path (if any)
        $student->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'image_upload' => $imagePath, // Update image path if a new image is uploaded
            'university_id' => $request->university_id, // Update the university_id as well
        ]);
    
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        // Delete the student image from storage
        if ($student->image_upload) {
            \Storage::disk('public')->delete($student->image_upload);
        }

        // Delete the student record from the database
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
}
