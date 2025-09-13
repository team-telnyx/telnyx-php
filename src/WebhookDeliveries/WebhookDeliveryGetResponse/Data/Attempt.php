<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\Status;

/**
 * Webhook delivery attempt details.
 *
 * @phpstan-type attempt_alias = array{
 *   errors?: list<int>,
 *   finishedAt?: \DateTimeInterface,
 *   http?: HTTP,
 *   startedAt?: \DateTimeInterface,
 *   status?: value-of<Status>,
 * }
 */
final class Attempt implements BaseModel
{
    /** @use SdkModel<attempt_alias> */
    use SdkModel;

    /**
     * Webhook delivery error codes.
     *
     * @var list<int>|null $errors
     */
    #[Api(list: 'int', optional: true)]
    public ?array $errors;

    /**
     * ISO 8601 timestamp indicating when the attempt has finished.
     */
    #[Api('finished_at', optional: true)]
    public ?\DateTimeInterface $finishedAt;

    /**
     * HTTP request and response information.
     */
    #[Api(optional: true)]
    public ?HTTP $http;

    /**
     * ISO 8601 timestamp indicating when the attempt was initiated.
     */
    #[Api('started_at', optional: true)]
    public ?\DateTimeInterface $startedAt;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $errors
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?array $errors = null,
        ?\DateTimeInterface $finishedAt = null,
        ?HTTP $http = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $errors && $obj->errors = $errors;
        null !== $finishedAt && $obj->finishedAt = $finishedAt;
        null !== $http && $obj->http = $http;
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Webhook delivery error codes.
     *
     * @param list<int> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * ISO 8601 timestamp indicating when the attempt has finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

        return $obj;
    }

    /**
     * HTTP request and response information.
     */
    public function withHTTP(HTTP $http): self
    {
        $obj = clone $this;
        $obj->http = $http;

        return $obj;
    }

    /**
     * ISO 8601 timestamp indicating when the attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
