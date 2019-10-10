<?php

namespace Telnyx;

class TelnyxObjectTest extends TestCase
{
    /**
     * @before
     */
    public function setUpReflectors()
    {
        // Sets up reflectors needed by some tests to access protected or
        // private attributes.

        // This is used to invoke the `deepCopy` protected function
        $this->deepCopyReflector = new \ReflectionMethod(\Telnyx\TelnyxObject::class, 'deepCopy');
        $this->deepCopyReflector->setAccessible(true);

        // This is used to access the `_opts` protected variable
        $this->optsReflector = new \ReflectionProperty(\Telnyx\TelnyxObject::class, '_opts');
        $this->optsReflector->setAccessible(true);
    }

    public function testArrayAccessorsSemantics()
    {
        $s = new TelnyxObject();
        $s['foo'] = 'a';
        $this->assertSame($s['foo'], 'a');
        $this->assertTrue(isset($s['foo']));
        unset($s['foo']);
        $this->assertFalse(isset($s['foo']));
    }

    public function testNormalAccessorsSemantics()
    {
        $s = new TelnyxObject();
        $s->foo = 'a';
        $this->assertSame($s->foo, 'a');
        $this->assertTrue(isset($s->foo));
        unset($s->foo);
        $this->assertFalse(isset($s->foo));
    }

    public function testArrayAccessorsMatchNormalAccessors()
    {
        $s = new TelnyxObject();
        $s->foo = 'a';
        $this->assertSame($s['foo'], 'a');

        $s['bar'] = 'b';
        $this->assertSame($s->bar, 'b');
    }

    public function testCount()
    {
        $s = new TelnyxObject();
        $this->assertSame(0, count($s));

        $s['key1'] = 'value1';
        $this->assertSame(1, count($s));

        $s['key2'] = 'value2';
        $this->assertSame(2, count($s));

        unset($s['key1']);
        $this->assertSame(1, count($s));
    }

    public function testKeys()
    {
        $s = new TelnyxObject();
        $s->foo = 'bar';
        $this->assertSame($s->keys(), ['foo']);
    }

    public function testValues()
    {
        $s = new TelnyxObject();
        $s->foo = 'bar';
        $this->assertSame($s->values(), ['bar']);
    }

    public function testNonexistentProperty()
    {
        $s = new TelnyxObject();
        $this->assertNull($s->nonexistent);
    }

    public function testPropertyDoesNotExists()
    {
        $s = new TelnyxObject();
        $this->assertNull($s['nonexistent']);
    }

    public function testJsonEncode()
    {
        $s = new TelnyxObject();
        $s->foo = 'a';

        $this->assertEquals('{"foo":"a"}', json_encode($s));
    }

    public function testReplaceNewNestedUpdatable()
    {
        $s = new TelnyxObject();

        $s->metadata = ['bar'];
        $this->assertSame($s->metadata, ['bar']);
        $s->metadata = ['baz', 'qux'];
        $this->assertSame($s->metadata, ['baz', 'qux']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetPermanentAttribute()
    {
        $s = new TelnyxObject();
        $s->id = 'abc_123';
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetEmptyStringValue()
    {
        $s = new TelnyxObject();
        $s->foo = '';
    }

    public function testSerializeParametersOnEmptyObject()
    {
        $obj = TelnyxObject::constructFrom([]);
        $this->assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnNewObjectWithSubObject()
    {
        $obj = new TelnyxObject();
        $obj->metadata = ['foo' => 'bar'];
        $this->assertSame(['metadata' => ['foo' => 'bar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnBasicObject()
    {
        $obj = TelnyxObject::constructFrom(['foo' => null]);
        $obj->updateAttributes(['foo' => 'bar']);
        $this->assertSame(['foo' => 'bar'], $obj->serializeParameters());
    }

    public function testSerializeParametersOnMoreComplexObject()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => TelnyxObject::constructFrom([
                'bar' => null,
                'baz' => null,
            ]),
        ]);
        $obj->foo->bar = 'newbar';
        $this->assertSame(['foo' => ['bar' => 'newbar']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArray()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => null,
        ]);
        $obj->foo = ['new-value'];
        $this->assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatShortens()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = ['new-value'];
        $this->assertSame(['foo' => ['new-value']], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayThatLengthens()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = array_fill(0, 4, 'new-value');
        $this->assertSame(['foo' => array_fill(0, 4, 'new-value')], $obj->serializeParameters());
    }

    public function testSerializeParametersOnArrayOfHashes()
    {
        $obj = TelnyxObject::constructFrom(['foo' => null]);
        $obj->foo = [
            TelnyxObject::constructFrom(['bar' => null]),
        ];

        $obj->foo[0]->bar = 'baz';
        $this->assertSame(['foo' => [['bar' => 'baz']]], $obj->serializeParameters());
    }

    public function testSerializeParametersDoesNotIncludeUnchangedValues()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => null,
        ]);
        $this->assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersOnUnchangedArray()
    {
        $obj = TelnyxObject::constructFrom([
            'foo' => ['0-index', '1-index', '2-index'],
        ]);
        $obj->foo = ['0-index', '1-index', '2-index'];
        $this->assertSame([], $obj->serializeParameters());
    }

    public function testSerializeParametersWithTelnyxObject()
    {
        $obj = TelnyxObject::constructFrom([]);
        $obj->metadata = TelnyxObject::constructFrom(['foo' => 'bar']);

        $serialized = $obj->serializeParameters();
        $this->assertSame(['foo' => 'bar'], $serialized['metadata']);
    }

    public function testSerializeParametersOnReplacedTelnyxObject()
    {
        $obj = TelnyxObject::constructFrom([
            'source' => TelnyxObject::constructFrom(['bar' => 'foo']),
        ]);
        $obj->source = TelnyxObject::constructFrom(['baz' => 'foo']);

        $serialized = $obj->serializeParameters();
        $this->assertSame(['baz' => 'foo'], $serialized['source']);
    }

    public function testSerializeParametersOnReplacedTelnyxObjectWhichIsMetadata()
    {
        $obj = TelnyxObject::constructFrom([
            'metadata' => TelnyxObject::constructFrom(['bar' => 'foo']),
        ]);
        $obj->metadata = TelnyxObject::constructFrom(['baz' => 'foo']);

        $serialized = $obj->serializeParameters();
        $this->assertSame(['bar' => '', 'baz' => 'foo'], $serialized['metadata']);
    }

    public function testSerializeParametersOnArrayOfTelnyxObjects()
    {
        $obj = TelnyxObject::constructFrom([]);
        $obj->metadata = [
            TelnyxObject::constructFrom(['foo' => 'bar']),
        ];

        $serialized = $obj->serializeParameters();
        $this->assertSame([['foo' => 'bar']], $serialized['metadata']);
    }

    public function testSerializeParametersForce()
    {
        $obj = TelnyxObject::constructFrom([
            'id' => 'id',
            'metadata' => TelnyxObject::constructFrom([
                'bar' => 'foo',
            ]),
        ]);

        $serialized = $obj->serializeParameters(true);
        $this->assertSame(['id' => 'id', 'metadata' => ['bar' => 'foo']], $serialized);
    }

    public function testDirty()
    {
        $obj = TelnyxObject::constructFrom([
            'id' => 'id',
            'metadata' => TelnyxObject::constructFrom([
                'bar' => 'foo',
            ]),
        ]);

        // note that `$force` and `dirty()` are for different things, but are
        // functionally equivalent
        $obj->dirty();

        $serialized = $obj->serializeParameters();
        $this->assertSame(['id' => 'id', 'metadata' => ['bar' => 'foo']], $serialized);
    }

    public function testDeepCopy()
    {
        $opts = [
            "api_base" => Telnyx::$apiBase,
            "api_key" => "apikey",
        ];
        $values = [
            "id" => 1,
            "name" => "Telnyx",
            "arr" => [
                TelnyxObject::constructFrom(["id" => "index0"], $opts),
                "index1",
                2,
            ],
            "map" => [
                "0" => TelnyxObject::constructFrom(["id" => "index0"], $opts),
                "1" => "index1",
                "2" => 2
            ],
        ];

        $copyValues = $this->deepCopyReflector->invoke(null, $values);

        // we can't compare the hashes directly because they have embedded
        // objects which are different from each other
        $this->assertEquals($values["id"], $copyValues["id"]);
        $this->assertEquals($values["name"], $copyValues["name"]);
        $this->assertEquals(count($values["arr"]), count($copyValues["arr"]));

        // internal values of the copied TelnyxObject should be the same,
        // but the object itself should be new (hence the assertNotSame)
        $this->assertEquals($values["arr"][0]["id"], $copyValues["arr"][0]["id"]);
        $this->assertNotSame($values["arr"][0], $copyValues["arr"][0]);

        // likewise, the Util\RequestOptions instance in _opts should have
        // copied values but be a new instance
        $this->assertEquals(
            $this->optsReflector->getValue($values["arr"][0]),
            $this->optsReflector->getValue($copyValues["arr"][0])
        );
        $this->assertNotSame(
            $this->optsReflector->getValue($values["arr"][0]),
            $this->optsReflector->getValue($copyValues["arr"][0])
        );

        // scalars however, can be compared
        $this->assertEquals($values["arr"][1], $copyValues["arr"][1]);
        $this->assertEquals($values["arr"][2], $copyValues["arr"][2]);

        // and a similar story with the hash
        $this->assertEquals($values["map"]["0"]["id"], $copyValues["map"]["0"]["id"]);
        $this->assertNotSame($values["map"]["0"], $copyValues["map"]["0"]);
        $this->assertNotSame(
            $this->optsReflector->getValue($values["arr"][0]),
            $this->optsReflector->getValue($copyValues["arr"][0])
        );
        $this->assertEquals(
            $this->optsReflector->getValue($values["map"]["0"]),
            $this->optsReflector->getValue($copyValues["map"]["0"])
        );
        $this->assertNotSame(
            $this->optsReflector->getValue($values["map"]["0"]),
            $this->optsReflector->getValue($copyValues["map"]["0"])
        );
        $this->assertEquals($values["map"]["1"], $copyValues["map"]["1"]);
        $this->assertEquals($values["map"]["2"], $copyValues["map"]["2"]);
    }

    public function testIsDeleted()
    {
        $obj = TelnyxObject::constructFrom([]);
        $this->assertFalse($obj->isDeleted());

        $obj = TelnyxObject::constructFrom(['deleted' => false]);
        $this->assertFalse($obj->isDeleted());

        $obj = TelnyxObject::constructFrom(['deleted' => true]);
        $this->assertTrue($obj->isDeleted());
    }

    public function testDeserializeEmptyMetadata()
    {
        $obj = TelnyxObject::constructFrom([
            'metadata' => [],
        ]);

        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $obj->metadata);
    }

    public function testDeserializeMetadataWithKeyNamedMetadata()
    {
        $obj = TelnyxObject::constructFrom([
            'metadata' => ['metadata' => 'value'],
        ]);

        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $obj->metadata);
        $this->assertEquals("value", $obj->metadata->metadata);
    }
}
