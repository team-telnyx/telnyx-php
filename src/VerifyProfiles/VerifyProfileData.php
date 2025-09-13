<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type verify_profile_data = array{data?: VerifyProfile}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifyProfileData implements BaseModel
{
    /** @use SdkModel<verify_profile_data> */
    use SdkModel;

    #[Api(optional: true)]
    public ?VerifyProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?VerifyProfile $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(VerifyProfile $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
