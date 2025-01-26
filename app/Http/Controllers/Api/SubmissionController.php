<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmissionRequest;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubmissionRequest $request)
    {
        // 1. Data validasi sudah otomatis divalidasi oleh StoreSubmissionRequest
        $validated = $request->validated();
        // 2. Proses upload file ke dalam storage submissions/id_peserta/assignment/file
        $folderPath = "submissions/{$validated['submitted_by']}/{$validated['assignment_id']}";
        $uploadedFilePath = $request->file('file')->store($folderPath, 'private');
        // 3. Simpan data ke database
        $submission = Submission::create([
            'assignment_id' => $validated['assignment_id'], // id assignment atau tugas
            'submitted_by' => $validated['submitted_by'], // id peserta
            'folder_path' => $uploadedFilePath, // lokasi file yang disimpan
        ]);
        
        return response()->json([
            'message' => 'Submit berhasil',
            'data' => $submission
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
