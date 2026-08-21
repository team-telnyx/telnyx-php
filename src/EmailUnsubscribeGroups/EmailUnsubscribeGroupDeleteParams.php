<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force\ForceString;

/**
 * If the group has 0 active suppressions, hard-deletes the row. With
 * `force=true`, soft-deletes all active suppressions first (status →
 * `removed`, `group_id` cleared, `removed` audit event per block) in a
 * single transaction, then hard-deletes the group. Without `force`
 * and active suppressions present → `409`. Audit trail is preserved.
 * `force` only accepts the string `"true"` or boolean `true`; all other
 * values are false.
 *
 * @see Telnyx\Services\EmailUnsubscribeGroupsService::delete()
 *
 * @phpstan-import-type ForceVariants from \Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force
 * @phpstan-import-type ForceShape from \Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force
 *
 * @phpstan-type EmailUnsubscribeGroupDeleteParamsShape = array{
 *   force?: ForceShape|null
 * }
 */
final class EmailUnsubscribeGroupDeleteParams implements BaseModel
{
    /** @use SdkModel<EmailUnsubscribeGroupDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Force-delete a group with active suppressions. Only `"true"` (string) or `true` (bool) are truthy; all other values are false.
     *
     * @var ForceVariants|null $force
     */
    #[Optional(union: Force::class)]
    public bool|string|null $force;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ForceShape|null $force
     */
    public static function with(bool|ForceString|string|null $force = null): self
    {
        $self = new self;

        null !== $force && $self['force'] = $force;

        return $self;
    }

    /**
     * Force-delete a group with active suppressions. Only `"true"` (string) or `true` (bool) are truthy; all other values are false.
     *
     * @param ForceShape $force
     */
    public function withForce(bool|ForceString|string $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }
}
