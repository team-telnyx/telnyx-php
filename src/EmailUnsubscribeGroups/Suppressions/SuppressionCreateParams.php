<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups\Suppressions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a suppression with `reason: unsubscribe`, `source: manual`,
 * `group_id: <this group>`. All other body fields are ignored; only
 * `to` is read. Idempotent (same dedupe key → `200`, no new event).
 *
 * @see Telnyx\Services\EmailUnsubscribeGroups\SuppressionsService::create()
 *
 * @phpstan-type SuppressionCreateParamsShape = array{to: string}
 */
final class SuppressionCreateParams implements BaseModel
{
    /** @use SdkModel<SuppressionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $to;

    /**
     * `new SuppressionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SuppressionCreateParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SuppressionCreateParams)->withTo(...)
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
    public static function with(string $to): self
    {
        $self = new self;

        $self['to'] = $to;

        return $self;
    }

    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
