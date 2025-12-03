<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a paginated list of assistant tests with optional filtering capabilities.
 *
 * @see Telnyx\Services\AI\Assistants\TestsService::list()
 *
 * @phpstan-type TestListParamsShape = array{
 *   destination?: string,
 *   page_number_?: int,
 *   page_size_?: int,
 *   telnyx_conversation_channel?: string,
 *   test_suite?: string,
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
    #[Api(optional: true)]
    public ?string $destination;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    #[Api(optional: true)]
    public ?string $telnyx_conversation_channel;

    /**
     * Filter tests by test suite name.
     */
    #[Api(optional: true)]
    public ?string $test_suite;

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
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?string $telnyx_conversation_channel = null,
        ?string $test_suite = null,
    ): self {
        $obj = new self;

        null !== $destination && $obj->destination = $destination;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;
        null !== $telnyx_conversation_channel && $obj->telnyx_conversation_channel = $telnyx_conversation_channel;
        null !== $test_suite && $obj->test_suite = $test_suite;

        return $obj;
    }

    /**
     * Filter tests by destination (phone number, webhook URL, etc.).
     */
    public function withDestination(string $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }

    /**
     * Filter tests by communication channel (e.g., 'web_chat', 'sms').
     */
    public function withTelnyxConversationChannel(
        string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj->telnyx_conversation_channel = $telnyxConversationChannel;

        return $obj;
    }

    /**
     * Filter tests by test suite name.
     */
    public function withTestSuite(string $testSuite): self
    {
        $obj = clone $this;
        $obj->test_suite = $testSuite;

        return $obj;
    }
}
