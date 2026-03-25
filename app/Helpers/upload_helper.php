<?php

/**
 * Handles file uploads to a specific directory.
 * @param \CodeIgniter\HTTP\Files\UploadedFile $file The uploaded file object
 * @param string $path The sub-directory within public/uploads/
 * @return string|false The new filename or false on failure
 */
function upload_image($file, $path)
{
    // Check if the file is valid and hasn't been moved yet
    if ($file->isValid() && !$file->hasMoved()) {
        
        // Generate a new unique name for the file to prevent overwriting
        $newName = $file->getRandomName();
        
        // Move the file to the target directory in public/uploads/
        $file->move(FCPATH . 'uploads/' . $path, $newName);
        
        return $newName;
    }

    return false;
}
