<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   appID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   jwt?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   solutionID?: string|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Hosted signup ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * Meta App ID the hosted signup onboards customers into.
     */
    #[Optional('app_id')]
    public ?string $appID;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * When the onboarding URL stops working.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Signed token embedded in `url`.
     */
    #[Optional]
    public ?string $jwt;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Meta Partner Solution ID linked to the app. Returned only when creating a hosted signup.
     */
    #[Optional('solution_id')]
    public ?string $solutionID;

    /**
     * Hosted onboarding URL to share with the end customer.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?string $appID = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $jwt = null,
        RecordType|string|null $recordType = null,
        ?string $solutionID = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $appID && $self['appID'] = $appID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $jwt && $self['jwt'] = $jwt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $solutionID && $self['solutionID'] = $solutionID;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Hosted signup ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Meta App ID the hosted signup onboards customers into.
     */
    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When the onboarding URL stops working.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Signed token embedded in `url`.
     */
    public function withJwt(string $jwt): self
    {
        $self = clone $this;
        $self['jwt'] = $jwt;

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
     * Meta Partner Solution ID linked to the app. Returned only when creating a hosted signup.
     */
    public function withSolutionID(string $solutionID): self
    {
        $self = clone $this;
        $self['solutionID'] = $solutionID;

        return $self;
    }

    /**
     * Hosted onboarding URL to share with the end customer.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
