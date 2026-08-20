<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\Import;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailBlockImportShape from \Telnyx\EmailBlocks\Import\EmailBlockImport
 *
 * @phpstan-type EmailBlockImportResponseShape = array{
 *   data: EmailBlockImport|EmailBlockImportShape
 * }
 */
final class EmailBlockImportResponse implements BaseModel
{
    /** @use SdkModel<EmailBlockImportResponseShape> */
    use SdkModel;

    /**
     * Import job. Schema fields hidden: `account_id`, `csv_content`,
     * `block_ttl_days`. Nullable fields use the omit-nullable pattern.
     */
    #[Required]
    public EmailBlockImport $data;

    /**
     * `new EmailBlockImportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlockImportResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlockImportResponse)->withData(...)
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
     * @param EmailBlockImport|EmailBlockImportShape $data
     */
    public static function with(EmailBlockImport|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Import job. Schema fields hidden: `account_id`, `csv_content`,
     * `block_ttl_days`. Nullable fields use the omit-nullable pattern.
     *
     * @param EmailBlockImport|EmailBlockImportShape $data
     */
    public function withData(EmailBlockImport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
