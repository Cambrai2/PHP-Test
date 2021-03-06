<?php
namespace JDI\Tests;

use JDI\Helper\PathBuilder as Path;
use PHPUnit\Framework\TestCase;

class PathBuilderTest extends TestCase
{
  public function testCustom()
  {
    echo 'console.log('. json_encode( $data ) .')';
    $this->assertEquals('abc', Path::custom('/', ['abc']));
    $this->assertEquals('abc', Path::custom('/', ['', 'abc']));
    $this->assertEquals('abc/d', Path::custom('/', ['abc', 'd']));
    $this->assertEquals('/abc', Path::custom('/', ['/abc']));
    $this->assertEquals('/abc/d', Path::custom('/', ['/abc', '', 'd']));
    $this->assertEquals('/abc/d', Path::custom('/', ['/abc', '/d']));
    $this->assertEquals('/abc/d/e/', Path::custom('/', ['/abc', '/d', 'e/']));
    $this->assertEquals('/abc/d/e/f', Path::custom('/', ['/abc', '/d', 'e/', 'f']));
    $this->assertEquals('/abc/d/0/f', Path::custom('/', ['/abc', '/d', 0, 'f']));
    $this->assertEquals('/abc/d/f', Path::custom('/', ['/abc', '/d', null, 'f']));
    $this->assertEquals('/abc/d/f', Path::custom('/', ['', '/abc', '', '/d', null, 'f']));
    $this->assertEquals('/abc/d/f/', Path::custom('/', ['', '', '/abc', null, null, '/d', null, 'f', '', '', '/']));
    $this->assertEquals('abc/d//e/f', Path::custom('/', ['abc', '/d//e/', 'f']));
    $this->assertEquals('//cdn.xyz.com/images', Path::custom('/', ['//cdn.xyz.com', 'images']));
  }

  public function testUrl()
  {
    $this->assertEquals('', Path::url(''));
    $this->assertEquals('abc', Path::url('abc'));
    $this->assertEquals('/', Path::url('/', ''));
    $this->assertEquals('/test', Path::url('/', 'test'));
    $this->assertEquals('/test', Path::url('/', '/test'));
    $this->assertEquals('/test', Path::url('', '/', '/test'));
    $this->assertEquals('/c/4/ab', Path::url('/', 'c', 4, 'ab'));
    $this->assertEquals('/c/0/ab', Path::url('/', 'c', 0, 'ab'));
    $this->assertEquals('/c/ab', Path::url('/', 'c', null, '', 'ab'));
    $this->assertEquals('/test', Path::url('/', '', '/test', ''));
    $this->assertEquals('//cdn.domain.tld/test', Path::url('//cdn.domain.tld', '', '/test', ''));
    $this->assertEquals('/test/subdir/test/', Path::url('/test/', '/subdir/test/'));
    $this->assertEquals('/test/subdir/test/', Path::url('/test', '/subdir/test', '/'));
    $this->assertEquals('test/subdir/test/', Path::url('test', '/subdir/test/'));
    $this->assertEquals('test/subdir//test/', Path::url('test', '/subdir//test/'));
  }

  public function testBuildPath()
  {
    $this->assertEquals("a" . DIRECTORY_SEPARATOR . "b", Path::system("a", "b"));
    $this->assertEquals("a" . DIRECTORY_SEPARATOR . "b", Path::system("a", "b"));
  }

  public function testBuildWindowsPath()
  {
    $this->assertEquals("a\\b", Path::windows("a", "b"));
  }

  public function testBuildUnixPath()
  {
    $this->assertEquals("a/b", Path::unix("a", "b"));
  }

  public function testBuildUrlPath()
  {
    $this->assertEquals("a/b", Path::url("a", "b"));
  }

  public function testBuildCustomPath()
  {
    $this->assertEquals("a|b", Path::custom("|", ["a", "b"]));
    $this->assertEquals("a|b|c", Path::custom("|", ["a", "|b|", "c"]));
    $this->assertEquals("a|b", Path::custom("|", [0 => "a", 1 => "b"]));
    $this->assertEquals("a/~~b", Path::custom("~~", [0 => "a/", 1 => "b"]));
  }

  public function baseNameProvider()
  {
    return [
      ['/', '/'],
      ['C:\\', 'C:'],
      ['/test/dir/123/file1', 'file1'],
      ['test/dir/123/file2', 'file2'],
      ['/file3', 'file3'],
      ['//test//dir1//file4', 'file4'],
      ['/test/dir2/dir5/', 'dir5'],
      ['C:\\Program Files\\Test Dir\\file6', 'file6'],
      ['C:\\test\\dir2/file7', 'file7'],
    ];
  }

}
