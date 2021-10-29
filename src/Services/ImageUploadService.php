<?php
namespace App\Services;

class ImageUploadService 
{
    const VALID_EXTENSIONS = ['jpg', 'jpeg', 'gif'];

    private $__images = [];

    public function upload($imageData)
    {
        if (\is_array($imageData['name'])) {
            $this->multipleUpload($imageData);
        } else {
            $this->simpleUpload($imageData);
        }

        return $this->processUploads();

    }

    public function simpleUpload($imageData)
    {
        $this->__images = [$imageData];
    }

    public function multipleUpload($multipleImagesData)
    {
        $totalImages = count($multipleImagesData['name']);
        $images = [];

        for ($i = 0; $i < $totalImages; $i++) {

            $curImage = [];

            foreach($multipleImagesData as $key=>$curImageDataValue) {
                $curImage[$key] = $curImageDataValue[$i];
            }

            array_push($images, $curImage);
        }

        $this->__images = $images;

    }

    public function processUploads()
    {
        // Processa todos os dados de imagens enviados

        foreach($this->__images as $key=>$imageDataToUpload) {
            
            $curImage =& $this->__images[$key];
            $validateImage = $this->validateImage($imageDataToUpload);
            $validImage = ! $validateImage['error'];

            if ($validImage) {
            
                $image = $imageDataToUpload['tmp_name'];
                $imageName = $imageDataToUpload['name'];
                $imageHash = \hash_file('md5', $image);
                $imageExtension = $this->getImageExtension($imageName);
    
                $imageFullPath = IMAGENS_UPLOAD_DIR . '/' . $imageHash . '.' . $imageExtension;

                if (\move_uploaded_file($image, $imageFullPath)) {
                    $curImage['hash'] = $imageHash;
                    $curImage['fullPath'] = $imageFullPath;
                }
            
            }

            $curImage = array_merge($curImage, $validateImage);
        }

        return $this->__images;
    }

    private function validateImage($imageData)
    {
        // Faz as validacoes necessárias ao upload da imagem

        $isValid = true;
        $errors = ['error' => false, 'messages' => []];
        
        $imageName = $imageData['name'];
        
        $invalidExtension = ! $this->isValidExtension($imageName);

        if ($invalidExtension) {
            $validExtensions = implode(', ', $this->getValidExtensions());
            $errors['error'] = true;
            array_push($errors['messages'], 'Tipo de imagem inválido. São permitidos: ' . $validExtensions);
        }

        return $errors;
    }

    private function isValidExtension($imageName)
    {
        // Checa se o tipo da imagem upada é valido

        $imageExtension = \mb_strtolower($this->getImageExtension($imageName));
        return \in_array($imageExtension, $this->getValidExtensions());
    }

    private function getValidExtensions()
    {
        // Esta função retorna os tipos de extensões de imagem validos para upload

        return self::VALID_EXTENSIONS;
    }

    private function getImageExtension($imageName)
    {
        return pathinfo($imageName, PATHINFO_EXTENSION);
    }

}