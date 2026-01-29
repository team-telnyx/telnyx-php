<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Recordings\Json;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes recording resource identified by recording id.
 *
 * @see Telnyx\Services\Texml\Accounts\Recordings\JsonService::deleteRecordingSidJson()
 *
 * @phpstan-type JsonDeleteRecordingSidJsonParamsShape = array{accountSid: string}
 */
final class JsonDeleteRecordingSidJsonParams implements BaseModel
{
    /** @use SdkModel<JsonDeleteRecordingSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * `new JsonDeleteRecordingSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonDeleteRecordingSidJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonDeleteRecordingSidJsonParams)->withAccountSid(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $accountSid): self
    {
        $self = new self;

        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }
}
