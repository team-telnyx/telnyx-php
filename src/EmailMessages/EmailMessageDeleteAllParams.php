<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently deletes every email in the authenticated account sent from or to the
 * supplied address, including retained events whose parent message has expired.
 * Events and durable recipients are deleted immediately with each message. The
 * operation never searches or reports matches in another account. The legacy
 * `/v2/emails` DELETE route is a backward-compatible alias.
 *
 * @see Telnyx\Services\EmailMessagesService::deleteAll()
 *
 * @phpstan-type EmailMessageDeleteAllParamsShape = array{address: string}
 */
final class EmailMessageDeleteAllParams implements BaseModel
{
    /** @use SdkModel<EmailMessageDeleteAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Sender or recipient address to delete. Matching is trimmed and case-insensitive.
     */
    #[Required]
    public string $address;

    /**
     * `new EmailMessageDeleteAllParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageDeleteAllParams::with(address: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageDeleteAllParams)->withAddress(...)
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
    public static function with(string $address): self
    {
        $self = new self;

        $self['address'] = $address;

        return $self;
    }

    /**
     * Sender or recipient address to delete. Matching is trimmed and case-insensitive.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }
}
