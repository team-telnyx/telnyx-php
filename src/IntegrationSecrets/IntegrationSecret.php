<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type integration_secret = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   identifier: string,
 *   recordType: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class IntegrationSecret implements BaseModel
{
    /** @use SdkModel<integration_secret> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $identifier;

    #[Api('record_type')]
    public string $recordType;

    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new IntegrationSecret()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecret::with(
     *   id: ..., createdAt: ..., identifier: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecret)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withIdentifier(...)
     *   ->withRecordType(...)
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
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $identifier,
        string $recordType,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->identifier = $identifier;
        $obj->recordType = $recordType;

        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withIdentifier(string $identifier): self
    {
        $obj = clone $this;
        $obj->identifier = $identifier;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
