<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type action_change_bundle_status_response = array{
 *   data?: PhoneNumberWithVoiceSettings
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ActionChangeBundleStatusResponse implements BaseModel
{
    /** @use SdkModel<action_change_bundle_status_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PhoneNumberWithVoiceSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PhoneNumberWithVoiceSettings $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PhoneNumberWithVoiceSettings $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
