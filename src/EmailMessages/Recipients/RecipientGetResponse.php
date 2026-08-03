<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailRecipientShape from \Telnyx\EmailMessages\Recipients\EmailRecipient
 *
 * @phpstan-type RecipientGetResponseShape = array{
 *   data: EmailRecipient|EmailRecipientShape
 * }
 */
final class RecipientGetResponse implements BaseModel
{
    /** @use SdkModel<RecipientGetResponseShape> */
    use SdkModel;

    #[Required]
    public EmailRecipient $data;

    /**
     * `new RecipientGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecipientGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecipientGetResponse)->withData(...)
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
     * @param EmailRecipient|EmailRecipientShape $data
     */
    public static function with(EmailRecipient|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailRecipient|EmailRecipientShape $data
     */
    public function withData(EmailRecipient|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
