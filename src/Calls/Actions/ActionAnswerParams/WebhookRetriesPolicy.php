<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookRetriesPolicyShape = array{retriesMs?: list<int>|null}
 */
final class WebhookRetriesPolicy implements BaseModel
{
    /** @use SdkModel<WebhookRetriesPolicyShape> */
    use SdkModel;

    /**
     * Array of delays in milliseconds between retry attempts. Total sum cannot exceed 60000ms.
     *
     * @var list<int>|null $retriesMs
     */
    #[Optional('retries_ms', list: 'int')]
    public ?array $retriesMs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $retriesMs
     */
    public static function with(?array $retriesMs = null): self
    {
        $self = new self;

        null !== $retriesMs && $self['retriesMs'] = $retriesMs;

        return $self;
    }

    /**
     * Array of delays in milliseconds between retry attempts. Total sum cannot exceed 60000ms.
     *
     * @param list<int> $retriesMs
     */
    public function withRetriesMs(array $retriesMs): self
    {
        $self = clone $this;
        $self['retriesMs'] = $retriesMs;

        return $self;
    }
}
