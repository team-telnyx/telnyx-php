<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationType;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow;
use Telnyx\PortingOrders\PortingOrdersActivationJob\Status;

/**
 * @phpstan-type porting_orders_activation_job = array{
 *   id?: string,
 *   activateAt?: \DateTimeInterface,
 *   activationType?: value-of<ActivationType>,
 *   activationWindows?: list<ActivationWindow>,
 *   createdAt?: \DateTimeInterface,
 *   recordType?: string,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PortingOrdersActivationJob implements BaseModel
{
    /** @use SdkModel<porting_orders_activation_job> */
    use SdkModel;

    /**
     * Uniquely identifies this activation job.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the activation job should be executed. This time should be between some activation window.
     */
    #[Api('activate_at', optional: true)]
    public ?\DateTimeInterface $activateAt;

    /**
     * Specifies the type of this activation job.
     *
     * @var value-of<ActivationType>|null $activationType
     */
    #[Api('activation_type', enum: ActivationType::class, optional: true)]
    public ?string $activationType;

    /**
     * List of allowed activation windows for this activation job.
     *
     * @var list<ActivationWindow>|null $activationWindows
     */
    #[Api('activation_windows', list: ActivationWindow::class, optional: true)]
    public ?array $activationWindows;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Specifies the status of this activation job.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('updated_at', optional: true)]
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
     * @param ActivationType|value-of<ActivationType> $activationType
     * @param list<ActivationWindow> $activationWindows
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activateAt && $obj->activateAt = $activateAt;
        null !== $activationType && $obj['activationType'] = $activationType;
        null !== $activationWindows && $obj->activationWindows = $activationWindows;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies this activation job.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation job should be executed. This time should be between some activation window.
     */
    public function withActivateAt(\DateTimeInterface $activateAt): self
    {
        $obj = clone $this;
        $obj->activateAt = $activateAt;

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
        $obj['activationType'] = $activationType;

        return $obj;
    }

    /**
     * List of allowed activation windows for this activation job.
     *
     * @param list<ActivationWindow> $activationWindows
     */
    public function withActivationWindows(array $activationWindows): self
    {
        $obj = clone $this;
        $obj->activationWindows = $activationWindows;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
