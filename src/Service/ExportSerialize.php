<?php

namespace App\Service;

use Symfony\Component\HttpKernel\KernelInterface;

class ExportSerialize implements ExportInterface
{
    protected KernelInterface $kernel;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * $data = [
     *  ['id' => 1, 'name' => 'Almaz'],
     *  ['id' => 2, 'name' => 'Almaz'],
     *  ['id' => 3, 'name' => 'Almaz'],
     * ]
     * 1,Almaz\n
     * 2,Almaz\n
     * 3,Almaz\n
     * @param array $data
     * @return string
     *
     */
    public function run (array $data): string
    {
        $string = serialize($data);
        $filename = tempnam(
            $this->kernel->getProjectDir() . '/var',
            'export-serialize-'
        );
        file_put_contents($filename, $string);
        return $filename;
    }

    public function getFileType(): string
    {
        return 'text/plain';
    }

    public function getFriendlyFileName(): string
    {
        return 'export-data.txt';
    }
}
