<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data\BlackBoxTest;

/**
 * @phpstan-type DataShape = array{
 *   black_box_tests?: list<BlackBoxTest>|null,
 *   product?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<BlackBoxTest>|null $black_box_tests */
    #[Api(list: BlackBoxTest::class, optional: true)]
    public ?array $black_box_tests;

    /**
     * The product associated with the black box test group.
     */
    #[Api(optional: true)]
    public ?string $product;

    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<BlackBoxTest|array{
     *   id?: string|null, record_type?: string|null, result?: float|null
     * }> $black_box_tests
     */
    public static function with(
        ?array $black_box_tests = null,
        ?string $product = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $black_box_tests && $obj['black_box_tests'] = $black_box_tests;
        null !== $product && $obj['product'] = $product;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * @param list<BlackBoxTest|array{
     *   id?: string|null, record_type?: string|null, result?: float|null
     * }> $blackBoxTests
     */
    public function withBlackBoxTests(array $blackBoxTests): self
    {
        $obj = clone $this;
        $obj['black_box_tests'] = $blackBoxTests;

        return $obj;
    }

    /**
     * The product associated with the black box test group.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
