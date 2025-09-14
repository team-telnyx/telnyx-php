<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a bucket.
 *
 * @see Telnyx->createBucket
 *
 * @phpstan-type client_create_bucket_params = array{locationConstraint?: string}
 */
final class ClientCreateBucketParams implements BaseModel
{
    /** @use SdkModel<client_create_bucket_params> */
    use SdkModel;
    use SdkParams;

    #[Api('LocationConstraint', optional: true)]
    public ?string $locationConstraint;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $locationConstraint = null): self
    {
        $obj = new self;

        null !== $locationConstraint && $obj->locationConstraint = $locationConstraint;

        return $obj;
    }

    public function withLocationConstraint(string $locationConstraint): self
    {
        $obj = clone $this;
        $obj->locationConstraint = $locationConstraint;

        return $obj;
    }
}
