<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type voicemail_new_response = array{data?: VoicemailPrefResponse}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VoicemailNewResponse implements BaseModel
{
    /** @use SdkModel<voicemail_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?VoicemailPrefResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?VoicemailPrefResponse $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(VoicemailPrefResponse $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
