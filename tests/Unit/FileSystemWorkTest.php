<?php

namespace Tests\Unit;

use App\Model\FileSystemWork;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FileSystemWorkTest extends TestCase
{
    private $model;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->model = new FileSystemWork();
    }

    public function testWriteFile()
    {
        $data = ['test' => 'test'];
        $this->assertNotFalse($this->model->writeFile($data));
    }

    public function testGetFile() {
        $this->assertIsArray($this->model->getFile());
        $this->assertNotEmpty($this->model->getFile());
    }
}
