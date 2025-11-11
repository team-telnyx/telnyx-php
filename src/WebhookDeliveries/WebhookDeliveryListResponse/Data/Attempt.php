<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt\HTTP;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt\Status;

/**
 * Webhook delivery attempt details.
 *
 * @phpstan-type AttemptShape = array{
 *   errors?: list<int>|null,
 *   finished_at?: \DateTimeInterface|null,
 *   http?: HTTP|null,
 *   started_at?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Attempt implements BaseModel
{
    /** @use SdkModel<AttemptShape> */
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $finished_at;

    /**
     * HTTP request and response information.
     */
    #[Api(optional: true)]
    public ?HTTP $http;

    /**
     * ISO 8601 timestamp indicating when the attempt was initiated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $started_at;

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
        ?\DateTimeInterface $finished_at = null,
        ?HTTP $http = null,
        ?\DateTimeInterface $started_at = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $errors && $obj->errors = $errors;
        null !== $finished_at && $obj->finished_at = $finished_at;
        null !== $http && $obj->http = $http;
        null !== $started_at && $obj->started_at = $started_at;
        null !== $status && $obj['status'] = $status;

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
        $obj->finished_at = $finishedAt;

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
        $obj->started_at = $startedAt;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
