<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailDomainShape from \Telnyx\EmailDomains\EmailDomain
 *
 * @phpstan-type EmailDomainResponseShape = array{
 *   data: EmailDomain|EmailDomainShape
 * }
 */
final class EmailDomainResponse implements BaseModel
{
    /** @use SdkModel<EmailDomainResponseShape> */
    use SdkModel;

    #[Required]
    public EmailDomain $data;

    /**
     * `new EmailDomainResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDomainResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDomainResponse)->withData(...)
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
     * @param EmailDomain|EmailDomainShape $data
     */
    public static function with(EmailDomain|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailDomain|EmailDomainShape $data
     */
    public function withData(EmailDomain|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
