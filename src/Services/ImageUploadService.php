<?php

namespace App\Services;

/**
 * Class ImageUploadService
 */
class ImageUploadService
{
    /**
     * Salva a imagem no servidor.
     *
     * @param $imageData
     * @return array
     */
    public function upload($imageData)
    {
        try {

            $image = $imageData['tmp_name'];
            $imageName = $imageData['name'];
            $imageHash = md5(strtotime("now"));
            $imageExtension = $this->getImageExtension($imageName);

            $imageFullPath = './assets/images/courses/' . $imageHash . '.' . $imageExtension;

            if (\move_uploaded_file($image, $imageFullPath)) {
                $curImage['hash'] = $imageHash;
                $curImage['fullPath'] = $imageFullPath;
            }

        } catch (\Exception $exception) {

            return [
                'status' => false,
                'message' => 'Ocorreu um erro ao importada a imagem!',
                'data' => ['log' => $exception->getMessage()]
            ];

        }

        # Retorna a resposta da requisição.
        return [
            'status' => true,
            'message' => 'Imagem importada com sucesso.',
            'data' => ['path' => $imageFullPath]
        ];

    }

    /**
     * Retorna a extensão da imagem.
     *
     * @param $imageName
     * @return array|string|string[]
     */
    private function getImageExtension($imageName)
    {
        return pathinfo($imageName, PATHINFO_EXTENSION);
    }

}