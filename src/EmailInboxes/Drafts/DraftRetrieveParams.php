<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a single draft. Drafts that have been sent remain retrievable, so the
 * exact content that was sent stays auditable.
 *
 * @see Telnyx\Services\EmailInboxes\DraftsService::retrieve()
 *
 * @phpstan-type DraftRetrieveParamsShape = array{inboxID: string}
 */
final class DraftRetrieveParams implements BaseModel
{
    /** @use SdkModel<DraftRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * `new DraftRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DraftRetrieveParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DraftRetrieveParams)->withInboxID(...)
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
