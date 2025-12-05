<?php

declare(strict_types=1);

namespace Telnyx\Texml;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\TexmlSecretsResponse\Data;
use Telnyx\Texml\TexmlSecretsResponse\Data\Value;

/**
 * @phpstan-type TexmlSecretsResponseShape = array{data?: Data|null}
 */
final class TexmlSecretsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TexmlSecretsResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
