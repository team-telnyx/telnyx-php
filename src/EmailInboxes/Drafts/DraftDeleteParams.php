<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently deletes an unsent draft. Drafts that are being sent or have been sent
 * cannot be deleted; sent drafts are retained for audit.
 *
 * @see Telnyx\Services\EmailInboxes\DraftsService::delete()
 *
 * @phpstan-type DraftDeleteParamsShape = array{inboxID: string}
 */
final class DraftDeleteParams implements BaseModel
{
    /** @use SdkModel<DraftDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * `new DraftDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DraftDeleteParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DraftDeleteParams)->withInboxID(...)
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
    public static function with(string $inboxID): self
    {
        $self = new self;

        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }
}
