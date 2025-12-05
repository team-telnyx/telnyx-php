<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationSecretShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   identifier: string,
 *   record_type: string,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class IntegrationSecret implements BaseModel
{
    /** @use SdkModel<IntegrationSecretShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created_at;

    #[Api]
    public string $identifier;

    #[Api]
    public string $record_type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new IntegrationSecret()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecret::with(
     *   id: ..., created_at: ..., identifier: ..., record_type: ...
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
        \DateTimeInterface $created_at,
        string $identifier,
        string $record_type,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['identifier'] = $identifier;
        $obj['record_type'] = $record_type;

        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withIdentifier(string $identifier): self
    {
        $obj = clone $this;
        $obj['identifier'] = $identifier;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
