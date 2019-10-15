<?php
namespace Telnyx;

class CollectionTest extends TestCase
{
    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = Collection::constructFrom([
            'data' => [['id' => 1]],
            'has_more' => true,
            'url' => '/things',
        ]);
    }

    public function testCanRetrieve()
    {
        $this->stubRequest(
            'GET',
            '/things/1',
            [],
            null,
            false,
            [
                'id' => 1,
            ]
        );

        $this->fixture->retrieve(1);
    }

    public function testCanCreate()
    {
        $this->stubRequest(
            'POST',
            '/things',
            [
                'foo' => 'bar',
            ],
            null,
            false,
            [
                'id' => 2,
            ]
        );

        $this->fixture->create([
            'foo' => 'bar',
        ]);
    }

    public function testCanIterate()
    {
        $seen = [];
        foreach ($this->fixture as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1], $seen);
    }

    public function testSupportsIteratorToArray()
    {
        $seen = [];
        foreach (iterator_to_array($this->fixture) as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1], $seen);
    }

    public function testHeaders()
    {
        $this->stubRequest(
            'POST',
            '/things',
            [
                'foo' => 'bar',
            ],
            [
                'Telnyx-Account: acct_foo',
                'Idempotency-Key: qwertyuiop',
            ],
            false,
            [
                'id' => 2,
            ]
        );

        $this->fixture->create([
            'foo' => 'bar',
        ], [
            'telnyx_account' => 'acct_foo',
            'idempotency_key' => 'qwertyuiop',
        ]);
    }
}
