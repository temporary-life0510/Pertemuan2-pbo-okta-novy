<?php

class Mahasiswa
{
    public string $nim;
    public string $nama;
    public string $prodi;
    public float $ipk;

    public function __construct(string $nim, string $nama, string $prodi, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    public function info(): string
    {
        return "NIM: {$this->nim}, Nama: {$this->nama}, Prodi: {$this->prodi}, IPK: {$this->ipk}";
    }

    public function predikat(): string
    {
        if ($this->ipk > 3.50) {
            return "Cumlaude";
        } elseif ($this->ipk >= 3.01) {
            return "Sangat Memuaskan";
        } elseif ($this->ipk >= 2.76) {
            return "Memuaskan";
        }
        
        return "Cukup";
    }
}
