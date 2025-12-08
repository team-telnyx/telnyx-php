<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationType;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow;
use Telnyx\PortingOrders\PortingOrdersActivationJob\Status;

/**
 * @phpstan-type PortingOrdersActivationJobShape = array{
 *   id?: string|null,
 *   activate_at?: \DateTimeInterface|null,
 *   activation_type?: value-of<ActivationType>|null,
 *   activation_windows?: list<ActivationWindow>|null,
 *   created_at?: \DateTimeInterface|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortingOrdersActivationJob implements BaseModel
{
    /** @use SdkModel<PortingOrdersActivationJobShape> */
    use SdkModel;

    /**
     * Uniquely identifies this activation job.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the activation job should be executed. This time should be between some activation window.
     */
    #[Optional]
    public ?\DateTimeInterface $activate_at;

    /**
     * Specifies the type of this activation job.
     *
     * @var value-of<ActivationType>|null $activation_type
     */
    #[Optional(enum: ActivationType::class)]
    public ?string $activation_type;

    /**
     * List of allowed activation windows for this activation job.
     *
     * @var list<ActivationWindow>|null $activation_windows
     */
    #[Optional(list: ActivationWindow::class)]
    public ?array $activation_windows;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Specifies the status of this activation job.
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
     * @param ActivationType|value-of<ActivationType> $activation_type
     * @param list<ActivationWindow|array{
     *   end_at?: \DateTimeInterface|null, start_at?: \DateTimeInterface|null
     * }> $activation_windows
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $activate_at = null,
        ActivationType|string|null $activation_type = null,
        ?array $activation_windows = null,
        ?\DateTimeInterface $created_at = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $activate_at && $obj['activate_at'] = $activate_at;
        null !== $activation_type && $obj['activation_type'] = $activation_type;
        null !== $activation_windows && $obj['activation_windows'] = $activation_windows;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies this activation job.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation job should be executed. This time should be between some activation window.
     */
    public function withActivateAt(\DateTimeInterface $activateAt): self
    {
        $obj = clone $this;
        $obj['activate_at'] = $activateAt;

        return $obj;
    }

    /**
     * Specifies the type of this activation job.
     *
     * @param ActivationType|value-of<ActivationType> $activationType
     */
    public function withActivationType(
        ActivationType|string $activationType
    ): self {
        $obj = clone $this;
        $obj['activation_type'] = $activationType;

        return $obj;
    }

    /**
     * List of allowed activation windows for this activation job.
     *
     * @param list<ActivationWindow|array{
     *   end_at?: \DateTimeInterface|null, start_at?: \DateTimeInterface|null
     * }> $activationWindows
     */
    public function withActivationWindows(array $activationWindows): self
    {
        $obj = clone $this;
        $obj['activation_windows'] = $activationWindows;

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
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Specifies the status of this activation job.
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
