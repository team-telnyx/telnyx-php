<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomain\Dkim;
use Telnyx\EmailDomains\EmailDomain\Inbound;
use Telnyx\EmailDomains\EmailDomain\RecordType;
use Telnyx\EmailDomains\EmailDomain\Reputation;

/**
 * @phpstan-import-type DkimShape from \Telnyx\EmailDomains\EmailDomain\Dkim
 * @phpstan-import-type EmailDmarcPolicyShape from \Telnyx\EmailDomains\EmailDmarcPolicy
 * @phpstan-import-type DNSRecordShape from \Telnyx\EmailDomains\DNSRecord
 * @phpstan-import-type InboundShape from \Telnyx\EmailDomains\EmailDomain\Inbound
 * @phpstan-import-type DomainsTrackingSettingsShape from \Telnyx\EmailDomains\DomainsTrackingSettings
 * @phpstan-import-type EmailDomainVerificationShape from \Telnyx\EmailDomains\EmailDomainVerification
 * @phpstan-import-type ReputationShape from \Telnyx\EmailDomains\EmailDomain\Reputation
 *
 * @phpstan-type EmailDomainShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dkim: Dkim|DkimShape,
 *   dmarcPolicy: null|EmailDmarcPolicy|EmailDmarcPolicyShape,
 *   dnsRecords: list<DNSRecord|DNSRecordShape>,
 *   domain: string,
 *   inbound: Inbound|InboundShape,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: EmailDomainStatus|value-of<EmailDomainStatus>,
 *   tracking: DomainsTrackingSettings|DomainsTrackingSettingsShape,
 *   type: EmailDomainType|value-of<EmailDomainType>,
 *   updatedAt: \DateTimeInterface,
 *   usableForInbound: bool,
 *   usableForSending: bool,
 *   verification: EmailDomainVerification|EmailDomainVerificationShape,
 *   reputation?: null|Reputation|ReputationShape,
 *   verifiedAt?: \DateTimeInterface|null,
 * }
 */
final class EmailDomain implements BaseModel
{
    /** @use SdkModel<EmailDomainShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public Dkim $dkim;

    /**
     * DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     */
    #[Required('dmarc_policy')]
    public ?EmailDmarcPolicy $dmarcPolicy;

    /** @var list<DNSRecord> $dnsRecords */
    #[Required('dns_records', list: DNSRecord::class)]
    public array $dnsRecords;

    #[Required]
    public string $domain;

    #[Required]
    public Inbound $inbound;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var value-of<EmailDomainStatus> $status */
    #[Required(enum: EmailDomainStatus::class)]
    public string $status;

    #[Required]
    public DomainsTrackingSettings $tracking;

    /**
     * Domain type. `custom` domains are account-owned (BYOD). `shared` domains are Telnyx-managed, visible to and usable by ALL accounts for sending, but read-only: only the owning (system) account may modify, verify, or delete them; other accounts receive 403 (code 10008).
     *
     * @var value-of<EmailDomainType> $type
     */
    #[Required(enum: EmailDomainType::class)]
    public string $type;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Required('usable_for_inbound')]
    public bool $usableForInbound;

    #[Required('usable_for_sending')]
    public bool $usableForSending;

    #[Required]
    public EmailDomainVerification $verification;

    /**
     * Sender reputation for this domain (present on all domain responses).
     */
    #[Optional]
    public ?Reputation $reputation;

    #[Optional('verified_at', nullable: true)]
    public ?\DateTimeInterface $verifiedAt;

    /**
     * `new EmailDomain()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDomain::with(
     *   id: ...,
     *   createdAt: ...,
     *   dkim: ...,
     *   dmarcPolicy: ...,
     *   dnsRecords: ...,
     *   domain: ...,
     *   inbound: ...,
     *   recordType: ...,
     *   status: ...,
     *   tracking: ...,
     *   type: ...,
     *   updatedAt: ...,
     *   usableForInbound: ...,
     *   usableForSending: ...,
     *   verification: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDomain)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDkim(...)
     *   ->withDmarcPolicy(...)
     *   ->withDNSRecords(...)
     *   ->withDomain(...)
     *   ->withInbound(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withTracking(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
     *   ->withUsableForInbound(...)
     *   ->withUsableForSending(...)
     *   ->withVerification(...)
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
     * @param Dkim|DkimShape $dkim
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy
     * @param list<DNSRecord|DNSRecordShape> $dnsRecords
     * @param Inbound|InboundShape $inbound
     * @param RecordType|value-of<RecordType> $recordType
     * @param EmailDomainStatus|value-of<EmailDomainStatus> $status
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape $tracking
     * @param EmailDomainType|value-of<EmailDomainType> $type
     * @param EmailDomainVerification|EmailDomainVerificationShape $verification
     * @param Reputation|ReputationShape|null $reputation
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        Dkim|array $dkim,
        EmailDmarcPolicy|array|null $dmarcPolicy,
        array $dnsRecords,
        string $domain,
        Inbound|array $inbound,
        RecordType|string $recordType,
        EmailDomainStatus|string $status,
        DomainsTrackingSettings|array $tracking,
        EmailDomainType|string $type,
        \DateTimeInterface $updatedAt,
        bool $usableForInbound,
        bool $usableForSending,
        EmailDomainVerification|array $verification,
        Reputation|array|null $reputation = null,
        ?\DateTimeInterface $verifiedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['dkim'] = $dkim;
        $self['dmarcPolicy'] = $dmarcPolicy;
        $self['dnsRecords'] = $dnsRecords;
        $self['domain'] = $domain;
        $self['inbound'] = $inbound;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['tracking'] = $tracking;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;
        $self['usableForInbound'] = $usableForInbound;
        $self['usableForSending'] = $usableForSending;
        $self['verification'] = $verification;

        null !== $reputation && $self['reputation'] = $reputation;
        null !== $verifiedAt && $self['verifiedAt'] = $verifiedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param Dkim|DkimShape $dkim
     */
    public function withDkim(Dkim|array $dkim): self
    {
        $self = clone $this;
        $self['dkim'] = $dkim;

        return $self;
    }

    /**
     * DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     *
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy
     */
    public function withDmarcPolicy(
        EmailDmarcPolicy|array|null $dmarcPolicy
    ): self {
        $self = clone $this;
        $self['dmarcPolicy'] = $dmarcPolicy;

        return $self;
    }

    /**
     * @param list<DNSRecord|DNSRecordShape> $dnsRecords
     */
    public function withDNSRecords(array $dnsRecords): self
    {
        $self = clone $this;
        $self['dnsRecords'] = $dnsRecords;

        return $self;
    }

    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * @param Inbound|InboundShape $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param EmailDomainStatus|value-of<EmailDomainStatus> $status
     */
    public function withStatus(EmailDomainStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape $tracking
     */
    public function withTracking(DomainsTrackingSettings|array $tracking): self
    {
        $self = clone $this;
        $self['tracking'] = $tracking;

        return $self;
    }

    /**
     * Domain type. `custom` domains are account-owned (BYOD). `shared` domains are Telnyx-managed, visible to and usable by ALL accounts for sending, but read-only: only the owning (system) account may modify, verify, or delete them; other accounts receive 403 (code 10008).
     *
     * @param EmailDomainType|value-of<EmailDomainType> $type
     */
    public function withType(EmailDomainType|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUsableForInbound(bool $usableForInbound): self
    {
        $self = clone $this;
        $self['usableForInbound'] = $usableForInbound;

        return $self;
    }

    public function withUsableForSending(bool $usableForSending): self
    {
        $self = clone $this;
        $self['usableForSending'] = $usableForSending;

        return $self;
    }

    /**
     * @param EmailDomainVerification|EmailDomainVerificationShape $verification
     */
    public function withVerification(
        EmailDomainVerification|array $verification
    ): self {
        $self = clone $this;
        $self['verification'] = $verification;

        return $self;
    }

    /**
     * Sender reputation for this domain (present on all domain responses).
     *
     * @param Reputation|ReputationShape $reputation
     */
    public function withReputation(Reputation|array $reputation): self
    {
        $self = clone $this;
        $self['reputation'] = $reputation;

        return $self;
    }

    public function withVerifiedAt(?\DateTimeInterface $verifiedAt): self
    {
        $self = clone $this;
        $self['verifiedAt'] = $verifiedAt;

        return $self;
    }
}
