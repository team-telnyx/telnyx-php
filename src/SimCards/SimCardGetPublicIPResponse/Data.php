<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetPublicIPResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardGetPublicIPResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   created_at?: string|null,
 *   ip?: string|null,
 *   record_type?: string|null,
 *   region_code?: string|null,
 *   sim_card_id?: string|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    #[Api(optional: true)]
    public ?string $ip;

    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $region_code;

    #[Api(optional: true)]
    public ?string $sim_card_id;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $created_at = null,
        ?string $ip = null,
        ?string $record_type = null,
        ?string $region_code = null,
        ?string $sim_card_id = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $ip && $obj['ip'] = $ip;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $region_code && $obj['region_code'] = $region_code;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj['ip'] = $ip;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['region_code'] = $regionCode;

        return $obj;
    }

    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
