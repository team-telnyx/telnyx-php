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
 * @phpstan-import-type ActivationWindowShape from \Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow
 *
 * @phpstan-type PortingOrdersActivationJobShape = array{
 *   id?: string|null,
 *   activateAt?: \DateTimeInterface|null,
 *   activationType?: null|ActivationType|value-of<ActivationType>,
 *   activationWindows?: list<ActivationWindow|ActivationWindowShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
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
    #[Optional('activate_at')]
    public ?\DateTimeInterface $activateAt;

    /**
     * Specifies the type of this activation job.
     *
     * @var value-of<ActivationType>|null $activationType
     */
    #[Optional('activation_type', enum: ActivationType::class)]
    public ?string $activationType;

    /**
     * List of allowed activation windows for this activation job.
     *
     * @var list<ActivationWindow>|null $activationWindows
     */
    #[Optional('activation_windows', list: ActivationWindow::class)]
    public ?array $activationWindows;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationType|value-of<ActivationType>|null $activationType
     * @param list<ActivationWindow|ActivationWindowShape>|null $activationWindows
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $activateAt = null,
        ActivationType|string|null $activationType = null,
        ?array $activationWindows = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $activateAt && $self['activateAt'] = $activateAt;
        null !== $activationType && $self['activationType'] = $activationType;
        null !== $activationWindows && $self['activationWindows'] = $activationWindows;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies this activation job.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the activation job should be executed. This time should be between some activation window.
     */
    public function withActivateAt(\DateTimeInterface $activateAt): self
    {
        $self = clone $this;
        $self['activateAt'] = $activateAt;

        return $self;
    }

    /**
     * Specifies the type of this activation job.
     *
     * @param ActivationType|value-of<ActivationType> $activationType
     */
    public function withActivationType(
        ActivationType|string $activationType
    ): self {
        $self = clone $this;
        $self['activationType'] = $activationType;

        return $self;
    }

    /**
     * List of allowed activation windows for this activation job.
     *
     * @param list<ActivationWindow|ActivationWindowShape> $activationWindows
     */
    public function withActivationWindows(array $activationWindows): self
    {
        $self = clone $this;
        $self['activationWindows'] = $activationWindows;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Specifies the status of this activation job.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
