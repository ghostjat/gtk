<?php

declare(strict_types=1);

namespace yf\Exception;

class InvalidValueException extends \Exception
{
    public function __construct(string $type)
    {
        parent::__construct(sprintf('Not a %s', $type));
    }
}
