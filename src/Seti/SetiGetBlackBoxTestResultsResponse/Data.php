<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data\BlackBoxTest;

/**
 * @phpstan-type DataShape = array{
 *   blackBoxTests?: list<BlackBoxTest>, product?: string, recordType?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<BlackBoxTest>|null $blackBoxTests */
    #[Api('black_box_tests', list: BlackBoxTest::class, optional: true)]
    public ?array $blackBoxTests;

    /**
     * The product associated with the black box test group.
     */
    #[Api(optional: true)]
    public ?string $product;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<BlackBoxTest> $blackBoxTests
     */
    public static function with(
        ?array $blackBoxTests = null,
        ?string $product = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $blackBoxTests && $obj->blackBoxTests = $blackBoxTests;
        null !== $product && $obj->product = $product;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<BlackBoxTest> $blackBoxTests
     */
    public function withBlackBoxTests(array $blackBoxTests): self
    {
        $obj = clone $this;
        $obj->blackBoxTests = $blackBoxTests;

        return $obj;
    }

    /**
     * The product associated with the black box test group.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
