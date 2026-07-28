<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups\Suppressions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Soft-deletes all active blocks for (account, group, normalized
 * email) — one `removed` audit event per block (`actor: manual`).
 * The `email` path segment is normalized (trim + lower-case) before
 * matching. Idempotent on already-removed rows (returns `404` since
 * they're no longer `active`).
 *
 * Two distinct `404` cases: a missing/cross-account **group** returns
 * `10001 "The requested unsubscribe group was not found"`; a group that
 * exists but has **no active suppression** for that email returns
 * `10001 "The requested group suppression was not found"`.
 *
 * @see Telnyx\Services\EmailUnsubscribeGroups\SuppressionsService::delete()
 *
 * @phpstan-type SuppressionDeleteParamsShape = array{id: string}
 */
final class SuppressionDeleteParams implements BaseModel
{
    /** @use SdkModel<SuppressionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new SuppressionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SuppressionDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SuppressionDeleteParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
