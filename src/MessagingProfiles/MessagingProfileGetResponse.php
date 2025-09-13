<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type messaging_profile_get_response = array{data?: MessagingProfile}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MessagingProfileGetResponse implements BaseModel
{
    /** @use SdkModel<messaging_profile_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MessagingProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MessagingProfile $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MessagingProfile $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
