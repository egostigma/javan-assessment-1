<div class="{{ $parent->children_count ? '_tree-root' : ''}} d_f">
    <div class="_tree-branch {{ $child->children_count ? 'has-children' : ''}}">
        <div class="_tree-raw d_f">
            <div class="_tree-leaf d_f">
                <div class="t_data g_{{ $child->gender }} d_f" onclick="location.href = '{{ route('family-member.show', $child->id) }}'">
                    <p class="short-name">{{ $child->name }}</p>
                </div>
            </div>
        </div>
        <div class="{{ $child->children_count ? '_new-branch' : ''}} d_f">
            @foreach ($child->children()->withCount("children")->get() as $child2)
                @include('components.child-tree', ["parent" => $child, "child" => $child2])
            @endforeach
        </div>
    </div>
</div>
