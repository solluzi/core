<?php
declare(strict_types=1);
namespace Solluzi\Helper;
/**
* @version		1.0.3
* @category		Action
* @package		
* @subpackage		
* @author		(name) <email@codesolluzi.com>
* @copyright	Copyright (c) 2022 Solluzi Tecnologia da Informação LTDA-ME. (https://codesolluzi.com)
* @license		https://codesolluzi.com/framework-license
*	
*	
*	
*/
class AbstractStreamWrapper
{
    public $context;

    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }

    public function dir_closedir(): bool
    {
        return false;
    }

    public function dir_opendir(string $path, int $options): bool
    {
        return false;
    }

    public function dir_readdir(): string
    {
        return '';
    }

    public function dir_rewinddir(): string
    {
        return '';
    }

    public function mkdir(string $path, int $mode, int $options): bool
    {
        return false;
    }

    public function rename(string $path_from, string $path_to): bool
    {
        return false;
    }

    public function rmdir(string $path, int $options): bool
    {
        return false;
    }

    public function stream_cast(int $cast_as): void
    {

    }

    public function stream_close(): void
    {

    }

    public function stream_eof(): bool
    {
        return false;
    }

    public function stream_flush(): bool
    {
        return false;
    }

    public function stream_lock(int $operation): bool
    {
        return false;
    }

    public function stream_metadata(string $path, int $option, mixed $value): bool
    {
        return false;
    }

    public function stream_open(string $path, string $mode, int $options, ?string &$opened_path): bool
    {
        return false;
    }

    public function stream_read(int $count): void
    {
        
    }

    public function stream_seek(int $offset, int $whence = SEEK_SET): bool
    {
        return false;
    }

    public function stream_set_option(int $option, int $arg1, int $arg2): bool
    {
        return false;
    }

    public function stream_stat()
    {

    }

    public function stream_tell(): int
    {
        return 1;
    }

    public function stream_truncate(int $new_size): bool
    {
        return false;
    }

    public function stream_write(string $data): int
    {
        return 0;
    }

    public function unlink(string $path): bool
    {
        return false;
    }

    public function url_stat(string $path, int $flags)
    {
        
    }

}