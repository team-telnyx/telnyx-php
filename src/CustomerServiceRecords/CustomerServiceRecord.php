<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Address;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result\Admin;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Status;

/**
 * @phpstan-type CustomerServiceRecordShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   error_message?: string|null,
 *   phone_number?: string|null,
 *   record_type?: string|null,
 *   result?: Result|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class CustomerServiceRecord implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordShape> */
    use SdkModel;

    /**
     * Uniquely identifies this customer service record.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * The error message in case status is `failed`. This field would be null in case of `pending` or `completed` status.
     */
    #[Optional(nullable: true)]
    public ?string $error_message;

    /**
     * The phone number of the customer service record.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
     */
    #[Optional(nullable: true)]
    public ?Result $result;

    /**
     * The status of the customer service record.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Result|array{
     *   address?: Address|null,
     *   admin?: Admin|null,
     *   associated_phone_numbers?: list<string>|null,
     *   carrier_name?: string|null,
     * }|null $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $error_message = null,
        ?string $phone_number = null,
        ?string $record_type = null,
        Result|array|null $result = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $error_message && $obj['error_message'] = $error_message;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $result && $obj['result'] = $result;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies this customer service record.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The error message in case status is `failed`. This field would be null in case of `pending` or `completed` status.
     */
    public function withErrorMessage(?string $errorMessage): self
    {
        $obj = clone $this;
        $obj['error_message'] = $errorMessage;

        return $obj;
    }

    /**
     * The phone number of the customer service record.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The result of the CSR request. This field would be null in case of `pending` or `failed` status.
     *
     * @param Result|array{
     *   address?: Address|null,
     *   admin?: Admin|null,
     *   associated_phone_numbers?: list<string>|null,
     *   carrier_name?: string|null,
     * }|null $result
     */
    public function withResult(Result|array|null $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }

    /**
     * The status of the customer service record.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
