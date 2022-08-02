@extends('app')

@section('title')
    {{ __('Family Tree') }} | {{ __('Home') }}
@endsection

@section('style')
<style>
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

:root {
	/* colors */
	--black: #3e3e3e;
	--white: #ffffff;
	--baseBg: #e6e6e6;
	--blue: #058aad;
	--red: #8a0505;
	--lightBlue: #dbf3fa;


	/* Animation */
	--transition: all 0.3s ease-in;

	/* font name */
	--roboto: 'Roboto', sans-serif;
	--borderGap: 25px;
}

body {
	font-size: 22px;
	line-height: 36px;
	color: var(--black);
	font-family: var(--jameel);
	background-color: var(--baseBg);
}

.d_f {
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
}

section {
	width: 100%;
	height: 100vh;
	position: relative;
	float: left;
	z-index: 0;
}

/* ----------------[ Shajra Tree ]---------------- */

	/* ==============  // Mapping child  ============== */
	.tree-main-container {
		background-color: white;
		margin: 0 auto;
	    max-width: 100%;
	    width: 100vw;
	}
	.tree-container {
		width: 100%;
		position: relative;
		padding: 50px;
		z-index: 0;
	}
	._tree-root {
	    width: 100%;
	    position: relative;
	    flex-wrap: wrap;
	    justify-content: flex-start;
	    align-content: flex-start;
	    z-index: 0;
	}
	._tree-branch {
	    width: auto;
	    height: min-content;
	    position: relative;
	    min-height: 20px;
	    z-index: 0;
	}
	._tree-raw {
	    position: relative;
	    width: 100%;
	    z-index: 0;
	}
	._tree-raw.active, ._tree-root.active {z-index: 10;}
	._tree-leaf {
	    position: relative;
	    width: 100%;
	    justify-content: center;
	    align-items: flex-start;
	    padding-bottom: var(--borderGap);
	    z-index: 1;
	    margin: 0 15px;
	}
	._treeData {
	    min-width: 300px;
	    height: 60px;
	    line-height: 60px;
	    text-align: center;
	    border: 1px solid #333;
	    font-size: 20px;
	    background-color: #fff;
	    padding: 0 50px;
	    white-space: nowrap;
	    position: relative;
	    text-align: center;
	    margin-right: 10px;
	    z-index: 0;
	}
	._treeData:last-child {margin-right: 0; }
	._new-branch {
		position: relative;
		justify-content: center;
		align-content: flex-start;
		align-items: flex-start;
	}
	._new-branch > div {flex: 1; }

	/* ==============  Table Cell Data  ============== */
		.t_data {
			margin: 0 auto;
			position: relative;
			width: auto;
			max-width: 150px;
			min-width: 150px;
			height: 50px;
			background-color: var(--baseBg);
			color: var(--green);
			align-items: center;
			padding: 0 10px;
			border-radius: 5px;
			transition: var(--transition);
			cursor: pointer;
			z-index: 1;
		}
		.t_data p {
			flex: 1;
			font-size: 16px;
			text-align: center;
			white-space: nowrap;
		    text-overflow: ellipsis;
		    overflow: hidden;
		}
		.g_m:hover, .g_m.active {
			background-color: var(--blue);
			color: var(--baseBg);
		}
		.g_m.active {background-color: var(--blue);z-index: 10;}
		.g_m.active ._readMore {transform: rotate(0deg); }
		.g_m.active .optnsCnt {display: block;}
		.g_m.active .optnBx {margin-top: 0;}
		.g_f:hover, .g_f.active {
			background-color: var(--red);
			color: var(--baseBg);
		}
		.g_f.active {background-color: var(--red);z-index: 10;}
		.g_f.active ._readMore {transform: rotate(0deg); }
		.g_f.active .optnsCnt {display: block;}
		.g_f.active .optnBx {margin-top: 0;}
		.optnsCnt {
			position: absolute;
			top: calc(100% + 5px);
			left: 0;
			width: 100%;
			/* display: none; */
			overflow: hidden;
		}
		.optnBx {
			position: relative;
			height: 65px;
			background-color: var(--baseBg);
			border-radius: 5px;
			justify-content: center;
			align-items: center;
			align-content: center;
			padding: 8px 6px;
			margin-bottom: 5px;
			margin-top: -200px;
			transition: var(--transition);
		}
		.optnBx::after {
			content: '';
			width: 1px;
			height: 20px;
			background-color: #333;
			position: absolute;
			left: calc(50% - 0.5px);
			top: calc(50% - 10px);
		}
		.optnBx a {
			flex: 1;
		    position: relative;
		    height: 100%;
		    margin: 2px;
		    line-height: 55px;
		    border-radius: 5px;
		    font-size: 24px;
		    text-align: right;
		    padding: 0 15px 0 10px;
		    transition: var(--transition);
		}
		.optnBx a i {width: 30px;font-size: 22px;margin-left: 10px;}
		.optnBx a:hover {
			background-color: var(--blue);
			color: var(--baseBg);
		}
	/* ==============  // Table Cell Data  ============== */

	/* ==============  Mapping Cell/children  ============== */
		.has-child > ._tree-raw::after,
		.has-children > ._tree-raw::after {
			content: '';
			width: 1px;
			height: var(--borderGap);
			position: absolute;
			top: calc(100% - var(--borderGap));
			left: calc(50% - 0.5px);
			background-color: #555;
		}
		.has-child > ._tree-raw:last-child::after {display: none;}
		.has-children > ._new-branch {padding-top: var(--borderGap); }
		.has-children > ._new-branch > ._tree-root::before,
		.has-children > ._new-branch > ._tree-root::after {
			display: block;
		}
		._new-branch > ._tree-root::before,
		._new-branch > ._tree-root::after {
			display: none;
			content: '';
		    position: absolute;
		    right: 50%;
		    width: 50%;
		    height: var(--borderGap);
		    top: calc(0% - var(--borderGap));
		    border-top: 1px solid #333;
		}
		._new-branch > ._tree-root::before {right: 0;}
		._new-branch > ._tree-root::after {left: 0;}

		._new-branch > ._tree-root:first-child::after,
		._new-branch > ._tree-root:last-child::before {display: none;}

		.has-children > ._new-branch > ._tree-root ._tree-leaf::after {
		    content: '';
		    width: 1px;
		    position: absolute;
		    height: var(--borderGap);
		    background-color: #333;
		    bottom: 100%;
		}
	/* ==============  // Mapping Cell  ============== */
/* ----------------[ Shajra Tree ]---------------- */
</style>
@endsection

@section('content')
    <section class="tree-main-container">
        @include('components.alert')
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a href="{{ route("family-member.create") }}" class="btn btn-info" type="button">{{ __("Add Family Member") }}</a>
                </div>
            </div>
        </div>
        <div class="tree-container d_f">
            <div class="_new-branch d_f">
                <div class="_tree-root d_f">
                    @foreach ($family_members as $family_member)
                        <div class="_tree-branch {{ $family_member->children_count ? 'has-children' : ''}}">
                            <div class="_tree-raw d_f">
                                <div class="_tree-leaf d_f">
                                    <div class="t_data g_{{ $family_member->gender }} d_f" onclick="location.href = '{{ route('family-member.show', $family_member->id) }}'">
                                        <p class="short-name">{{ $family_member->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $family_member->children_count ? '_new-branch' : ''}} d_f">
                                @foreach ($family_member->children()->withCount("children")->get() as $child)
                                    @include('components.child-tree', ["parent" => $family_member, "child" => $child])
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
