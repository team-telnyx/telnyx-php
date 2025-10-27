<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\JobError;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{url?: string}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    /**
     * URL with additional information on the error.
     */
    #[Api(optional: true)]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $url = null): self
    {
        $obj = new self;

        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * URL with additional information on the error.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
