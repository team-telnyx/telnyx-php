<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailBlockShape from \Telnyx\EmailBlocks\EmailBlock
 *
 * @phpstan-type EmailBlockResponseShape = array{data: EmailBlock|EmailBlockShape}
 */
final class EmailBlockResponse implements BaseModel
{
    /** @use SdkModel<EmailBlockResponseShape> */
    use SdkModel;

    /**
     * Suppression record. Schema fields hidden by the view:
     * `account_id`, `bounce_category`, `dsn_code`, `meta`.
     */
    #[Required]
    public EmailBlock $data;

    /**
     * `new EmailBlockResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlockResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlockResponse)->withData(...)
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
     *
     * @param EmailBlock|EmailBlockShape $data
     */
    public static function with(EmailBlock|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Suppression record. Schema fields hidden by the view:
     * `account_id`, `bounce_category`, `dsn_code`, `meta`.
     *
     * @param EmailBlock|EmailBlockShape $data
     */
    public function withData(EmailBlock|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
