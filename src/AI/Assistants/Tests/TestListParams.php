<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a paginated list of assistant tests with optional filtering capabilities.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::list()
 *
 * @phpstan-type TestListParamsShape = array{
 *   destination?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   telnyxConversationChannel?: string|null,
 *   testSuite?: string|null,
 * }
 */
final class TestListParams implements BaseModel
{
    /** @use SdkModel<TestListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    #[Optional]
    public ?string $destination;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    #[Optional]
    public ?string $telnyxConversationChannel;

    /**
     * Filter tests by test suite name.
     */
    #[Optional]
    public ?string $testSuite;

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
        ?string $destination = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $telnyxConversationChannel = null,
        ?string $testSuite = null,
    ): self {
        $self = new self;

        null !== $destination && $self['destination'] = $destination;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $telnyxConversationChannel && $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        null !== $testSuite && $self['testSuite'] = $testSuite;

        return $self;
    }

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    public function withDestination(string $destination): self
    {
        $self = clone $this;
        $self['destination'] = $destination;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    public function withTelnyxConversationChannel(
        string $telnyxConversationChannel
    ): self {
        $self = clone $this;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $self;
    }

    /**
     * Filter tests by test suite name.
     */
    public function withTestSuite(string $testSuite): self
    {
        $self = clone $this;
        $self['testSuite'] = $testSuite;

        return $self;
    }
}
