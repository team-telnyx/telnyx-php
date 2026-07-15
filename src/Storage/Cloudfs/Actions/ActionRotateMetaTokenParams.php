<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Issues a new metadata access token for the filesystem and returns the full filesystem, including the new `meta_token` and credential-bearing `meta_url`. The previous token stops authenticating immediately; the metadata database and S3 bucket are unchanged. The request takes no body. Allowed while the filesystem is `ready` or `needs_format`; otherwise returns a `409`. Retrying with the same `Idempotency-Key` within 24 hours replays the original response — including the same token — instead of rotating again.
 *
 * @see Telnyx\Services\Storage\Cloudfs\ActionsService::rotateMetaToken()
 *
 * @phpstan-type ActionRotateMetaTokenParamsShape = array{idempotencyKey: string}
 */
final class ActionRotateMetaTokenParams implements BaseModel
{
    /** @use SdkModel<ActionRotateMetaTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    /**
     * `new ActionRotateMetaTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRotateMetaTokenParams::with(idempotencyKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRotateMetaTokenParams)->withIdempotencyKey(...)
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
    public static function with(string $idempotencyKey): self
    {
        $self = new self;

        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
