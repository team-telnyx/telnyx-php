<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DNSRecordShape from \Telnyx\EmailDomains\DNSRecord
 *
 * @phpstan-type EmailDomainGetDNSRecordsResponseShape = array{
 *   data: list<DNSRecord|DNSRecordShape>
 * }
 */
final class EmailDomainGetDNSRecordsResponse implements BaseModel
{
    /** @use SdkModel<EmailDomainGetDNSRecordsResponseShape> */
    use SdkModel;

    /** @var list<DNSRecord> $data */
    #[Required(list: DNSRecord::class)]
    public array $data;

    /**
     * `new EmailDomainGetDNSRecordsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDomainGetDNSRecordsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDomainGetDNSRecordsResponse)->withData(...)
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
     * @param list<DNSRecord|DNSRecordShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<DNSRecord|DNSRecordShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
