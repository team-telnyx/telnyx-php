<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoicemailUpdateResponseShape = array{
 *   data?: VoicemailPrefResponse|null
 * }
 */
final class VoicemailUpdateResponse implements BaseModel
{
    /** @use SdkModel<VoicemailUpdateResponseShape> */
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
     *
     * @param VoicemailPrefResponse|array{enabled?: bool|null, pin?: string|null} $data
     */
    public static function with(VoicemailPrefResponse|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param VoicemailPrefResponse|array{enabled?: bool|null, pin?: string|null} $data
     */
    public function withData(VoicemailPrefResponse|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
