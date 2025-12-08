<?php

declare(strict_types=1);

namespace Telnyx\Texml;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\TexmlSecretsResponse\Data;
use Telnyx\Texml\TexmlSecretsResponse\Data\Value;

/**
 * @phpstan-type TexmlSecretsResponseShape = array{data?: Data|null}
 */
final class TexmlSecretsResponse implements BaseModel
{
    /** @use SdkModel<TexmlSecretsResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{name?: string|null, value?: value-of<Value>|null} $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{name?: string|null, value?: value-of<Value>|null} $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
